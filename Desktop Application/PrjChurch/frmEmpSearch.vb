Imports System.Data.OleDb
Public Class frmEmpSearch

    Private Sub dtDepartment_CellClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtDepartment.CellClick
        Me.BringToFront()
    End Sub

    Private Sub dtCousecode_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtDepartment.CellContentClick

    End Sub

    Private Sub dtDepartment_CellContentDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtDepartment.CellContentDoubleClick
        Try
            Dim rowme As Integer = 0
            Dim empstat As String = ""
            Dim newdate As String = ""
            Dim newdate_year As String = ""

            frmEmployee.DepartId = dtDepartment.CurrentRow.Cells(0).Value
            frmsalGrade.DepartSaId = dtDepartment.CurrentRow.Cells(0).Value
            frmEmpEdit.BookNamess = dtDepartment.CurrentRow.Cells(0).Value
            TextBox1.Text = dtDepartment.CurrentRow.Cells(0).Value

            If CheckBox2.Checked = False Then
                Me.Close()
                Exit Sub
            End If
            Exit Sub

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub



    Private Sub dtDepartment_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtDepartment.DoubleClick
        Try
            Dim rowme As Integer = 0
            Dim empstat As String = ""
            Dim newdate As String = ""
            Dim newdate_year As String = ""

            frmEmployee.DepartId = dtDepartment.CurrentRow.Cells(0).Value
            frmsalGrade.DepartSaId = dtDepartment.CurrentRow.Cells(0).Value
            frmEmpEdit.BookNamess = dtDepartment.CurrentRow.Cells(0).Value
            TextBox1.Text = dtDepartment.CurrentRow.Cells(0).Value

            If CheckBox2.Checked = False Then
                Me.Close()
                Exit Sub
            End If
           
            Exit Sub

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub frmEmpSearch_Activated(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Activated
        Me.MdiParent = mdiChurch

        Me.Top = 100
        Me.Left = 600
        Me.Width = 404
        Me.Height = 291
    End Sub

    Private Sub frmEmpSearch_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load
        Try
            Me.MdiParent = mdiChurch

            Me.Top = 100
            Me.Left = 600
            Me.Width = 404
            Me.Height = 291

            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [departStaff]"
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
                str_sql_user_select = "SELECT vDepartStaffCode,vDepartName  FROM departStaff"

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                ' dt.Columns.Add("description", GetType(String))
                dtDepartment.Rows.Add(rows)
                'If dr.Read.Equals(True) Then
                Dim ro As Integer = 0
                While myAccessReader.Read()
                    'reading from the datareader
                    dtDepartment.Rows(ro).Cells(0).Value = myAccessReader("vDepartStaffCode")
                    dtDepartment.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")
                    ' dtDepartment.Rows(ro).Cells(2).Value = myreader("vSection")
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

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        Try



            Call conns()
            Dim ro As Integer = 0
            str_sql_user_select = "SELECT COUNT(vDepartName) AS [RecordCount] FROM  [departStaff] "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer = 0
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            strconss.Close()

            dtDepartment.Rows.Clear()
            Call conns()
            ro = 0
            str_sql_user_select = "SELECT * FROM departStaff  where vDepartName  like '" & TextBox2.Text & "%'  "


            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            ' dt.Columns.Add("description", GetType(String))

            dtDepartment.Rows.Add(rows)

            While myAccessReader.Read()

                'reading from the datareader

                dtDepartment.Rows(ro).Cells(0).Value = myAccessReader("vDepartStaffCode")
                dtDepartment.Rows(ro).Cells(1).Value = myAccessReader("vDepartName")




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