Imports System.Data.OleDb
Public Class frmSalpuup


    Private Sub dtSalGrad_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtSalGrad.CellClick
        Me.BringToFront()
    End Sub

    Private Sub dtCousecode_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtSalGrad.CellContentClick

    End Sub

    Private Sub frmSalpuup_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        'Me.MdiParent = mdiSchool


    End Sub

    Private Sub frmSalpuup_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.MdiParent = mdiChurch

            Me.Width = 413
            Me.Height = 283
            Me.Top = 100
            Me.Left = 540



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
                Call conns()
                str_sql_user_select = "SELECT vPosCode,vSalGrade,vPosition  FROM Positions"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtSalGrad.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtSalGrad.Rows(ro).Cells(0).Value = myAccessReader("vPosCode")
                    dtSalGrad.Rows(ro).Cells(1).Value = myAccessReader("vSalGrade")
                    dtSalGrad.Rows(ro).Cells(2).Value = myAccessReader("vPosition")
                    'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                    ro += 1

                End While

                ' myreader.Close()
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub dtSalGrad_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtSalGrad.CellDoubleClick
        Try
            frmEmployee.SalGrade = dtSalGrad.CurrentRow.Cells(0).Value
            'frmEmployeeEdit.SalGrades = dtSalGrad.CurrentRow.Cells(0).Value


            If CheckBox2.Checked = False Then

                Me.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub dtSalGrad_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtSalGrad.DoubleClick
        Try
            frmEmployee.SalGrade = dtSalGrad.CurrentRow.Cells(0).Value
            'frmEmployeeEdit.SalGrades = dtSalGrad.CurrentRow.Cells(0).Value




            If CheckBox2.Checked = False Then

                Me.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try



            Call conns()
            Dim ro As Integer = 0
            str_sql_user_select = "SELECT COUNT(vPosCode) AS [RecordCount] FROM  [Positions] "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myreader.Close()
            mycon.Close()

            dtSalGrad.Rows.Clear()
            Call conns()
            ro = 0
            str_sql_user_select = "SELECT * FROM Positions  where vPosition  like '" & TextBox2.Text & "%'  "


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' dt.Columns.Add("description", GetType(String))

            dtSalGrad.Rows.Add(rows)

            While myAccessReader.Read()

                'reading from the datareader

                'reading from the datareader
                dtSalGrad.Rows(ro).Cells(0).Value = myAccessReader("vPosCode")
                dtSalGrad.Rows(ro).Cells(1).Value = myAccessReader("vSalGrade")
                dtSalGrad.Rows(ro).Cells(2).Value = myAccessReader("vPosition")




                'dtCousecode.Rows(ro).Cells(3).Value = myreader("CatExample")

                ro += 1

                'End If
            End While
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub
End Class