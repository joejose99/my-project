Imports System.Data.OleDb
Public Class frmSalGradeEdit

    Private Sub frmSalGradeEdit_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.MdiParent = mdiChurch
        Me.Left = 0
        Me.Top = 100
        Me.Height = 388
        Me.Width = 759
    End Sub

    Private Sub frmSalGradeEdit_Click(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Click
        Me.BringToFront()
    End Sub

    Private Sub frmSalGradeEdit_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Me.MdiParent = mdiChurch
        Me.Left = 0
        Me.Top = 100
        Me.Height = 388
        Me.Width = 759
        butEdit.Visible = False
        butDelete.Visible = False
        Call requery()
    End Sub

    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Dim code As String

            Dim ro As Integer
            Dim sqlString As String = ""
            Dim rows As Integer

            ' If txtDptCode.Text <> "" And ComboBox2.Enabled = False And ComboBox2.Text <> "" Then
            Dim Choice As String
            Choice = MsgBox("Are you sure you want to Edit?", vbYesNo + vbInformation, "Edit")
            If Choice = vbYes Then


                Call conns()



                ' Me.dtCourse.Rows.Clear()
                'reading from the datareader


                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Positions]"
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                While myAccessReader.Read
                    rows = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                code = dtgvResult.Rows(ro).Cells(0).Value
                While rows > ro
                    For i As Integer = 0 To dtgvResult.RowCount - 1

                        If code = codes Then


                            sqlString = "UPDATE  [Positions] SET " & _
                            "[vPosition] = '" & dtgvResult.Rows(ro).Cells(2).Value & "' ," & _
                            "[vSalGrade] = '" & dtgvResult.Rows(ro).Cells(3).Value & " '," & _
                            "[mSalary] = " & dtgvResult.Rows(ro).Cells(4).Value & " ," & _
                            "[vDepartStaffCode] = '" & dtgvResult.Rows(ro).Cells(5).Value & " '," & _
                            "[ddate] = '" & dtgvResult.Rows(ro).Cells(6).Value & "'" & _
                             "where id =" & codes & "  And vPosCode ='" & PositionCode & "'"




                            comUserSelectS = New OleDbCommand(sqlString, strconss)
                            myAccessReader = comUserSelectS.ExecuteReader()
                        End If

                    Next i

                    ro += 1
                    code = dtgvResult.Rows(ro).Cells(0).Value

                End While
                MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")


                Exit Sub
                strconss.Close()
                ' End If


                strconss.Close()
            End If
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private codes As String
    Private PositionCode As String
    Private Sub requery()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Positions]"
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()
            Dim rows As Integer
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            If rows <> 0 Then

                dtgvResult.Rows.Clear()
                Call conns()
                str_sql_user_select = "SELECT *  FROM Positions"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtgvResult.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()

                    'reading from the datareader
                    dtgvResult.Rows(ro).Cells(0).Value = myAccessReader("id")
                    dtgvResult.Rows(ro).Cells(1).Value = myAccessReader("vPosCode")
                    dtgvResult.Rows(ro).Cells(2).Value = myAccessReader("vPosition")
                    dtgvResult.Rows(ro).Cells(3).Value = myAccessReader("vSalGrade")
                    dtgvResult.Rows(ro).Cells(4).Value = Format(Val(myAccessReader("mSalary")))
                    dtgvResult.Rows(ro).Cells(5).Value = myAccessReader("vDepartStaffCode")
                    dtgvResult.Rows(ro).Cells(6).Value = myAccessReader("ddate")
                    'dtgvResult.Rows(ro).Cells(7).Value = myAccessReader("ddate")



                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                    'End If
                End While


                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub dtgvResult_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtgvResult.CellClick
        codes = ""
        codes = dtgvResult.CurrentRow.Cells(0).Value()
        PositionCode = dtgvResult.CurrentRow.Cells(1).Value()
        Me.BringToFront()
    End Sub

    Private Sub dtgvResult_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtgvResult.CellContentClick
        codes = ""
        codes = dtgvResult.CurrentRow.Cells(0).Value()
    End Sub

    Private Sub butDelete_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDelete.Click
        Try
            Dim Choices As String

            If PositionCode <> "" Then

                Choices = MsgBox("Are you sure you want to Delete?", vbYesNo + vbInformation, "Delete")

                If Choices = vbYes Then
                    Call conns()
                    str_sql_user_select = "Delete from [Positions] where vPosCode='" & PositionCode & "' and id=" & codes & ""

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()
                    MsgBox("Data has been Deleted", MsgBoxStyle.Information, "Delete")

                End If
            End If
            myAccessReader.Close()
            strconss.Close()
            Call requery()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try

    End Sub

    Private Sub butexit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butexit.Click
        Me.Close()
    End Sub

    Private Sub dtgvResult_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtgvResult.DoubleClick
        butEdit.Visible = True
        butDelete.Visible = True
    End Sub

    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        If butEdit.Visible = False Then
            butEdit.Visible = True
            butDelete.Visible = True
            Exit Sub
        End If

        If butEdit.Visible = True Then
            butEdit.Visible = False
            butDelete.Visible = False
            Exit Sub
        End If
    End Sub

    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        requery()
    End Sub
End Class